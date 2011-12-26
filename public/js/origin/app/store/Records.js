/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 21:15
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.store.Records', {
    extend: 'Ext.data.TreeStore',
    proxy: {
        type: 'ajax',
        baseUrl: Origin.baseUrl,
        url: 'data-get/entity/record/handler/get-list'
    },
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
    root: {
        leaf : false,
        draggable : false,
        editable : false,
        name: 'Root',
        description: 'Root description'
    }
});
