/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 21:33
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Ext.origin.collectionsPanel' ,{
    extend: 'Ext.tree.Panel',
    alias : 'widget.CollectionsPanel',
    title : 'All Users',
    initComponent: function() {
        this.store = Ext.create('Ext.data.TreeStore', {
            proxy: {
                type: 'ajax',
                url: 'get-nodes.php'
            },
            root: {
                text: 'Ext JS',
                id: 'src',
                expanded: true
            },
            folderSort: true,
            sorters: [{
                property: 'text',
                direction: 'ASC'
            }]
        });


        this.columns = [
            {header: 'Name',  dataIndex: 'name',  flex: 1},
            {header: 'Email', dataIndex: 'email', flex: 1}
        ];

        this.callParent(arguments);
    }

});