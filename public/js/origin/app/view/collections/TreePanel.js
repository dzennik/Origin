/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 21:54
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.view.collections.TreePanel', {
    extend: 'Ext.tree.Panel',
    store: 'Collections',
    alias : 'widget.collections.TreePanel',
    id: 'mongo-editor-tree-panel',
    useArrows: true,

    columns: [{
        xtype: 'treecolumn', //this is so we know which column will show the tree
        text: 'Key',
        flex: 2,
        sortable: false,
        dataIndex: 'text'
    },{
        text: 'Value',
        flex: 1,
        dataIndex: 'value',
        editor:{xtype:'textfield',allowBlank:false}
    }],

    plugins: [
        Ext.create('Ext.grid.plugin.CellEditing', {clicksToEdit:2})
    ],

    viewConfig: {
        toggleOnDblClick: false, // important!

        stripeRows: true,
        listeners: {
            itemcontextmenu: function(view, record, node, index, e) {
                var self = Ext.getCmp('mongo-editor-tree-panel');

                e.stopEvent();

                var addAction = Ext.create('Ext.Action', {
                    text: 'Add',
                    handler: function(){
                        Ext.Msg.alert('Click', 'Add action.');
                    }
                });

                var removeAction = Ext.create('Ext.Action', {
                    text: 'Remove',
                    handler: function(){
                        Ext.Msg.alert('Click', 'Remove action.');
                    }
                });

                self.contextMenu.removeAll();

                if (record.data.cls !== 'root') {
                    self.contextMenu.add(addAction);
                }
                self.contextMenu.add(removeAction);

                self.contextMenu.showAt(e.getXY());
                return false;
            },
            itemclick: function(view, record, node, index, e, options) {
            }
        }
    },
    initComponent: function() {
        this.callParent(arguments);

        this.getStore().getRootNode().expand();

        this.contextMenu = Ext.widget('collections.TreePanel.ContextMenu');
    }
});