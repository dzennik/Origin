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
    'Ext.tab.*',
    'Ext.window.*',
    'Ext.util.*',
    'Ext.layout.container.Border'
]);

Ext.define('Board', {
    app: null,

    constructor: function(app){
        this.app = app;
    },

    openPanel: function() {
        this.app.win.show();
    }
});

Ext.application({
    appFolder: Origin.appUrlDirect,
    name: 'Origin',
    controllers: [
        'Application'
    ],
    initPanel: function () {
        if (!this.win) {
            this.win = Ext.create('widget.window', {
                title: 'Layout Window',
                closable: true,
                closeAction: 'hide',
                //animateTarget: this,
                width: 600,
                height: 350,
                layout: 'border',
                bodyStyle: 'padding: 5px;',
                items: [{
                    id: 'collection-tree-panel',
                    region: 'west',
                    xtype: 'collections.Tree',
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
                        title: 'Bogus Tab',
                        items: [{
                            xtype: 'button',
                            text: 'Action',
                            handler: function() {
                                /*Ext.Ajax.request({
                                    url: Origin.baseUrl,
                                    method: 'POST',
                                    params: {
                                        action: 'data-get'
                                    },
                                    success: function (response) {
                                        var nodes = Ext.decode(response.responseText);

                                        var tree = Ext.getCmp('my-tree');

                                        var rootNode = tree.getStore().getRootNode();

                                        rootNode.removeAll();

                                        Ext.Array.each(nodes, function (node) {
                                            rootNode.appendChild(rootNode.createNode(node));
                                        });
                                    }
                                });*/
                            }
                        }]
                    }, {
                        title: 'Another Tab',
                        html: 'Hello world 2'
                    }, {
                        title: 'Closable Tab',
                        html: '',
                        closable: true
                    }]
                }]
            });

            Ext.getCmp('collection-tree-panel').getStore().getRootNode().expand();
        }
    },

    initBaseUrl: function() {
        Origin.baseUrl = Ext.DomQuery.select('base[href]')[0].href;
    },

    launch: function() {
        var app = this;

        this.initBaseUrl();
        this.initPanel();

        app.board = new Board(app);

        app.map = new Ext.util.KeyMap(Ext.getDoc().dom, [{
            scope: this.board,
            key: [Ext.EventObject.A],
            ctrl: true,
            fn: app.board.openPanel
        }]);
    }
});