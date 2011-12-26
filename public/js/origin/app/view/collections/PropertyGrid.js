/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 12:49
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.view.collections.PropertyGrid', {
    extend: 'Ext.grid.property.Grid',
    alias: 'widget.collections.PropertyGrid',
    source: {
        'keughi': '324'
    },
    initComponent: function() {
        this.callParent(arguments);
    }
});