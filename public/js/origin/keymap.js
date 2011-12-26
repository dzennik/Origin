/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 24.12.11
 * Time: 14:26
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Board', {
    movePanel: function() {
        console.log(this.app.win);
        this.app.win.setSize(this.getWidth(), this.getHeight());
        this.app.win.alignTo(Ext.getBody(), 'bl-bl');
    },

    getWidth: function() {
        return window.innerWidth;
    },

    getHeight: function() {
        return window.innerHeight / 3;
    },

    app: null,

    constructor: function(app){
        this.app = app;
    },

    openPanel: function() {
        this.app.win.show();

        this.movePanel();
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
            this.win = Ext.create('widget.control.Window', {
                cls: 'origin',
                xtype: 'control.Window',
                title: 'Control Panel',
                closable: true,
                closeAction: 'hide',
                bodyStyle: 'padding: 5px;'
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

        window.onresize = function () {
            app.board.movePanel();
        }
    }
});