/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 11.09.11
 * Time: 22:50
 * To change this template use File | Settings | File Templates.
 */

Ext.ns('App');
Ext.ns('Origin');

App.baseUrl         = Ext.DomQuery.select('base[href]')[0].href;
Origin.baseUrl      = App.baseUrl + 'js/origin/';
Origin.appUrlDirect = Origin.baseUrl + 'app';
Origin.appUrl       = Origin.appUrlDirect + '/';

Ext.require([
    'Ext.menu.*',
    'Ext.tab.*',
    'Ext.window.*',
    'Ext.util.*',
    'Ext.tree.*',
    'Ext.grid.*',
    'Ext.container.Viewport',
    'Ext.layout.container.Accordion',
    'Ext.layout.container.Border'
]);

Ext.application({
    appFolder: Origin.appUrlDirect,
    name: 'Origin',
    controllers: [
        'Application'
    ],

    initLayout: function() {

        Ext.create('Ext.Viewport', {
            id: 'MongoEditor',
            layout: {
                type: 'border',
                padding: 5
            },
            defaults: {
                split: true
            },
            items: [{
                region: 'north',
                html: 'north'
            },{
                region: 'west',
                layout: 'fit',
                minWidth: 200,
                width: 500,
                items: [{
                    xtype: 'collections.TreePanel'
                }],
                tbar: [{
                    xtype: 'button',
                    text: 'Add',
                    handler: {

                    }
                },{
                    xtype: 'button',
                    text: 'Remove',
                    handler: {

                    }
                }]
            },{
                region: 'center',
                html: 'center'
            },{
                region: 'east',
                html: 'east'
            },{
                region: 'south',
                html: 'south'
            }]
        });
    },

    initBaseUrl: function() {
        Origin.baseUrl = Ext.DomQuery.select('base[href]')[0].href;
    },

    launch: function() {
        var app = this;

        this.initBaseUrl();
        this.initLayout();
    }
});