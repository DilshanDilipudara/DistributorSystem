<template>
    <el-container>
        <el-header>
            <el-row>
                <el-col :span="4" :offset="2">
                    <span>My Orders: </span><el-tag>{{ user }}</el-tag>
                </el-col>
                <el-col :span="16">
                        <el-date-picker
                            @change="handleDateRangeChange"
                            v-model="value1"
                            type="daterange"
                            align="right"
                            unlink-panels
                            range-separator="To"
                            start-placeholder="Start date"
                            end-placeholder="End date"
                            :picker-options="pickerOptions"
                            value-format="yyyy-MM-dd"
                            style="width:450px">
                        </el-date-picker>
                </el-col>
            </el-row>
        </el-header>
        <el-main style="padding:0 20px">
            <el-row>
                <el-col :span="20" :offset="2">
                    <el-tabs type="border-card" v-model="activeName"
                             @tab-click="handleClick"
                             :stretch="true">
                        <el-tab-pane label="All Orders" name="first"><invoice-table :tableData="invoices"/></el-tab-pane>
                        <el-tab-pane label="Money to be collected" name="second"><invoice-table :tableData="toBeCollectedInvoices"/></el-tab-pane>
                        <el-tab-pane label="Completed" name="third"><invoice-table :tableData="completedInvoices"/></el-tab-pane>
                        <el-tab-pane label="Collect within next 7 days" name="fourth"><invoice-table :tableData="nextSevenInvoices"/></el-tab-pane>
                        <el-tab-pane label="Deliver Pending" name="fifth"><invoice-table :tableData="pendingInvoices"/></el-tab-pane>
                    </el-tabs>
                </el-col>
            </el-row>
        </el-main>
    </el-container>
</template>

<script>
    import InvoiceTable from './InvoiceTable';
    export default {
        components: {
            InvoiceTable,
        },
        props: [ 'user' ],
        data() {
            return {
                activeName: 'first',
                invoices: [],
                formInline: {
                    start: '',
                    end: ''
                },
                pickerOptions: {
                    shortcuts: [{
                        text: 'Last week',
                        onClick(picker) {
                            const end = new Date();
                            const start = new Date();
                            start.setTime(start.getTime() - 3600 * 1000 * 24 * 7);
                            picker.$emit('pick', [start, end]);
                        }
                    }, {
                        text: 'Last month',
                        onClick(picker) {
                            const end = new Date();
                            const start = new Date();
                            start.setTime(start.getTime() - 3600 * 1000 * 24 * 30);
                            picker.$emit('pick', [start, end]);
                        }
                    }, {
                        text: 'Last 3 months',
                        onClick(picker) {
                            const end = new Date();
                            const start = new Date();
                            start.setTime(start.getTime() - 3600 * 1000 * 24 * 90);
                            picker.$emit('pick', [start, end]);
                        }
                    }]
                },
                value1: [],
            };
        },
        computed: {
            toBeCollectedInvoices() {
                return this.invoices.filter((invoice) => {
                    return invoice.pending_amount > 0;
                });
            },
            completedInvoices() {
                return this.invoices.filter((invoice) => {
                    return invoice.pending_amount <= 0;
                });
            },
            nextSevenInvoices() {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const sevenFuture = new Date();
                sevenFuture.setTime(today.getTime() + 3600 * 1000 * 24 * 7);

                return this.invoices.filter((invoice) => {
                    const due_date = new Date(invoice.cheque_date).getTime();
                    return (today.getTime()  <= due_date && due_date <= sevenFuture.getTime());
                });
            },
            pendingInvoices() {
                const today = new Date();
                return this.invoices.filter((invoice) => {
                    return (new Date(invoice.deliver_date).getTime() >= today.getTime());
                });
            },
        },
        methods: {
            handleClick(tab, event) {
                // console.log(tab, event);
            },
            handleDateRangeChange(dates) {
                axios.get(`/invoices?maxDate=${dates ? dates[1] : ''}&minDate=${dates ? dates[0] : ''}`)
                .then((res) => {
                    this.invoices = res.data;
                })
                .catch(err => console.error(err));
            }
        },
        created() {
            axios.get('/invoices')
            .then((res) => {
                this.invoices = res.data;
            })
            .catch(err => console.error(err));
        }
    };
</script>
