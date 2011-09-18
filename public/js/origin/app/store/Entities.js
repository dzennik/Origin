/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 22:08
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.store.Entities', {
    extend: 'Ext.data.TreeStore',
    proxy: {
        type: 'ajax',
        url: Origin.appUrl + 'data/entities.js'
    },
    root: {
        text: 'Entities',
        id: 'root',
        expanded: true
    }
});
