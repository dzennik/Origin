/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 20:39
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.controller.Collection', {
    itemChange: function(component, record, dom, index, event, options) {
        switch (record.data.cls) {
            case 'collection':

                break;

            case 'document':
                break;

            case 'param':

                break;
        }

        var url = 'data-get/entity/record/handler/get-list/node/' + record.data.id;
        Ext.getCmp('collection-records-tree').getStore().getProxy().url = url;
        Ext.getCmp('collection-records-tree').getStore().load();

        console.log(record.data.cls);
    }
});