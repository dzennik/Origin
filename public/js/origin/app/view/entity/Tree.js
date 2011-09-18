/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 21:54
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.view.entity.Tree' ,{
    extend: 'Ext.tree.Panel',
    alias : 'widget.entity.Tree',

    title : 'Tree',
    store: 'Entities',

    initComponent: function() {
        this.callParent(arguments);
    }
});