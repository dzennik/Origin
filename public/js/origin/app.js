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
                    region: 'west',
                    title: 'Navigation',
                    width: 200,
                    split: true,
                    collapsible: true,
                    floatable: false,
                    items: [
                        {xtype: 'entity.Tree'}
                    ]
                }, {
                    region: 'center',
                    xtype: 'tabpanel',
                    items: [{
                        title: 'Bogus Tab',
                        html: 'Hello world 1'
                    }, {
                        title: 'Another Tab',
                        html: 'Hello world 2'
                    }, {
                        title: 'Closable Tab',
                        html: 'Hello world 3',
                        closable: true
                    }]
                }]
            });
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

        console.log('ready');
    }
});


/*JS.require('JS.Class', function() {
   var Animal = new JS.Class({
        initialize: function(name) {
            this.name = name;
        },

        speak: function(things) {
            return 'My name is ' + this.name + ' and I like ' + things;
        }
    });

    var cat = new Animal('Kitty');
});*/