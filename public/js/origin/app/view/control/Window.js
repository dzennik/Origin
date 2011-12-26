/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 12.11.11
 * Time: 10:48
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.view.control.Window', {
    extend: 'Ext.window.Window',
    alias : 'widget.control.Window',
    layout: 'border',
    items: [{
        id: 'collection-tree-panel',
        xtype: 'collections.TreePanel',
        region: 'west',
        title: 'Navigation',
        width: 200,
        split: true,
        collapsible: true,
        floatable: false,
        layout: 'fit'
    }, {
        region: 'center',
        xtype: 'tabpanel',
        items: [{
            id: 'collection-property-grid',
            title: 'Properties',
            xtype: 'collections.PropertyGrid'
        }, {
            id: 'collection-records-tree',
            title: 'Records',
            xtype: 'records.TreePanel'
        }]
    }],
    initComponent: function() {
        this.callParent(arguments);
    }
});