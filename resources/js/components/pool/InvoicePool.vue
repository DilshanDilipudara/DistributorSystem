<template>
    <el-container>
        <el-header>
            <el-row>
                <el-col :span="4" :offset="2">
                    <span>My Orders: </span><el-tag>{{ user }}</el-tag>
                </el-col>
                <el-col :span="16">
                        <el-date-picker
                            v-model="value1"
                            type="daterange"
                            align="right"
                            unlink-panels
                            range-separator="To"
                            start-placeholder="Start date"
                            end-placeholder="End date"
                            :picker-options="pickerOptions"
                            style="width:450px">
                        </el-date-picker>
                </el-col>
            </el-row>
        </el-header>
        <el-main>
            <el-row>
                <el-col :span="20" :offset="2">
                    <el-tabs type="border-card" v-model="activeName" @tab-click="handleClick" :stretch="true">
                        <el-tab-pane label="All Orders" name="first"><invoice-table :tableData="invoices"/></el-tab-pane>
                        <el-tab-pane label="Money to be collected" name="second">Money to be collected</el-tab-pane>
                        <el-tab-pane label="Completed" name="third">Completed</el-tab-pane>
                        <el-tab-pane label="Collect within next 7 days" name="fourth">Collect within next 7 days</el-tab-pane>
                        <el-tab-pane label="Deliver Pending" name="fifth">Deliver Pending</el-tab-pane>
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
                value1: '',
            };
        },
        methods: {
            handleClick(tab, event) {
                // console.log(tab, event);
            },
            onSubmit() {
                console.log('submit!');
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
