/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 18.09.11
 * Time: 21:47
 * To change this template use File | Settings | File Templates.
 */

Ext.define('Origin.controller.Application', {
    extend: 'Ext.app.Controller',

    stores: [
        'Entities'
    ],

    views: [
        'entity.Tree'
    ],

    init: function () {
        console.log('Initialized Application!');

/*        this.control({
            'viewport > panel': {
                render: this.onPanelRendered
            }
        });*/

    }
});