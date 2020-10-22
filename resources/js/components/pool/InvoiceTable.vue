<template>
    <el-table
        :data="tableData"
        style="width: 100%"
        :row-class-name="tableRowClassName"
        show-summary
        max-height="500">
        <el-table-column
            prop="number"
            label="Invoice Number">
        </el-table-column>
        <el-table-column
            prop="date"
            label="Order Date">
        </el-table-column>
        <el-table-column
            prop="cheque_date"
            label="Money collecting due date">
        </el-table-column>
        <el-table-column
            prop="shop_name"
            label="Customer">
        </el-table-column>
        <el-table-column
            prop="total"
            label="Total Amount">
        </el-table-column>
        <el-table-column
            label="Pending Amount">
        <template slot-scope="scope">
            <span>{{ scope.row.pending_amount <= 0 ? 0.00 : Math.round(scope.row.pending_amount * 100) / 100  }}</span>
        </template>
        </el-table-column>
        <el-table-column
            prop="item_count"
            label="Item count">
        </el-table-column>
        <el-table-column
            label="Status">
            <template slot-scope="scope">
                <span>{{ scope.row.closed ? 'completed' :'half'  }}</span>
            </template>
        </el-table-column>
        <el-table-column
            prop="comment"
            label="Comment">
        </el-table-column>
    </el-table>
</template>

<style>
    .el-table .warning-row {
        background: oldlace;
    }

    .el-table .success-row {
        background: #f0f9eb;
    }
</style>

<script>
    export default {
        props:['tableData'],
        data() {
            return {

            }
        },
        methods: {
            tableRowClassName({row, rowIndex}) {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const sevenFuture = new Date();
                sevenFuture.setTime(today.getTime() + 3600 * 1000 * 24 * 7);

                const due_date = new Date(row.cheque_date).getTime();
                const dueInSevenDays = (today.getTime()  <= due_date && due_date <= sevenFuture.getTime()) && row.closed === 0;

                if (dueInSevenDays) {
                    return 'warning-row';
                } else {
                    return '';
                }
            }
        },
    }
</script>
