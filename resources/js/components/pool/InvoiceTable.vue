<template>
    <el-table
        :data="tableData"
        style="width: 100%"
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
            prop="pending_amount"
            label="Pending Amount">
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
        methods: {
            tableRowClassName({row, rowIndex}) {
                if (rowIndex === 1) {
                    return 'warning-row';
                } else if (rowIndex === 3) {
                    return 'success-row';
                }
                return '';
            }
        },
    }
</script>
