/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 21:11
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.view.records.TreePanel', {
    extend: 'Ext.tree.Panel',
    store: 'Records',
    alias : 'widget.records.TreePanel',
    fields: ['name', 'value'],
    columns: [{
        xtype: 'treecolumn',
        text: 'Name',
        dataIndex: 'name',
        width: 150,
        sortable: true
    }, {
        text: 'Value',
        dataIndex: 'value',
        flex: 1,
        sortable: true
    }],
    initComponent: function() {
        this.callParent(arguments);
    }
});