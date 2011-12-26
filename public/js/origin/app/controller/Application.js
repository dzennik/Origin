/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 21:47
 * To change this template use File | Settings | File Templates.
 */

Ext.require([
    'Origin.controller.Collection'
]);

Ext.define('Origin.controller.Application', {
    extend: 'Ext.app.Controller',

    stores: [
        'Collections',
        'Records'
    ],

    views: [
        'collections.PropertyGrid',
        'collections.TreePanel.ContextMenu',
        'collections.TreePanel',
        'records.TreePanel',
        'control.Window'
    ],

    init: function () {
        console.log('Initialized Application!');

        //var collectionController = new Origin.controller.Collection();

//        this.control({
//            '[xtype=control.Window] > [xtype=collections.TreePanel]': {
//                itemclick: collectionController.itemChange
//            }
//        });

    }
});