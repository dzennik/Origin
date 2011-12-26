/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 22:08
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.store.Collections', {
    extend: 'Ext.data.TreeStore',
    proxy: {
        type: 'ajax',
        baseUrl: Origin.baseUrl,
        url: 'data-get/entity/collection/handler/get-list'
    },
    root: {
        leaf : false,
        draggable : false,
        editable : false,
        cls: 'root',
        iconCls: 'tree',
        text: 'Collections',
        id: 'root'
    }
});
