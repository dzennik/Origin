/**
 * Created by JetBrains PhpStorm.
 * User: kulitskyd
 * Date: 24.12.11
 * Time: 14:24
 * To change this template use File | Settings | File Templates.
 */

Ext.create('Ext.Viewport', {
    layout: {
        type: 'border',
        padding: 5
    },
    defaults: {
        split: true
    },
    items: [{
        region: 'north',
        collapsible: true,
        title: 'North',
        height: 100,
        html: 'north'
    },{
        region: 'west',
        collapsible: true,
        width: '30%',
        title: 'Navigation',
        width: 300,
        layout:'accordion',
        defaults: {
            bodyStyle: 'padding:15px'
        },
        layoutConfig: {
            // layout-specific configs go here
            titleCollapse: false,
            animate: true,
            activeOnTop: true
        },
        items: [{
            title: 'Layouts',
            items: [
                {
                    xtype: 'button',
                    text: 'select',
                    handler: function() {
                        var iframeDocument = Ext.get('page-iframe').dom.contentDocument;

                        var iframeBody   = Ext.get(Ext.DomQuery.select('body', iframeDocument));
                        var iframeAllEls = Ext.DomQuery.select('body *', iframeDocument);

                        // get x-origin-selector element
                        if (Ext.DomQuery.select('.x-origin-selector', iframeDocument).length > 0) {
                            var mainSelector = Ext.DomQuery.select('.x-origin-selector', iframeDocument)[0];
                            var mainSelectorEl = Ext.get(mainSelector);
                        } else {
                            // creating x-origin-selector element:
                            var mainSelector = iframeDocument.createElement('div');
                            var mainSelectorEl = Ext.get(mainSelector);

                            mainSelectorEl.addCls('x-origin-selector');

                            iframeDocument.body.appendChild(mainSelector);

                            mainSelectorEl.removeSelector = function() {
                                this.setSize(0,0);
                                this.setX(0);
                                this.setY(0);
                                this.removeCls('move');
                            }

                            mainSelectorEl.on('mouseout', mainSelectorEl.removeSelector, mainSelectorEl);

                            mainSelectorEl.on('click', function() {
                                console.log(mainSelectorEl.selectEl.dom);
                                mainSelectorEl.removeSelector();
                                Ext.Array.forEach(iframeAllEls, function(el) {
                                    var el = Ext.get(el);

                                    el.un('mouseover');
                                    el.un('mouseout');

                                });

                                mainSelectorEl.active = false;
                            });
                        }

                        mainSelectorEl.active = true;

                        Ext.Array.forEach(iframeAllEls, function(el) {
                            var el = Ext.get(el);
                            if (!el.hasCls('x-origin-selector')) {
                                el.on('mouseover', function () {
                                    mainSelectorEl.setSize(el.getSize().width, el.getSize().height);
                                    mainSelectorEl.setX(el.getX());
                                    mainSelectorEl.setY(el.getY());
                                    mainSelectorEl.addCls('move');
                                    mainSelectorEl.selectEl = el;
                                });
                            }
                        });
                    }
                }
            ]
        },{
            title: 'Components',
            html: 'Panel content!'
        }]
    },{
        region: 'center',
        html: '<iframe id="page-iframe" src="http://origin/page" width="100%" height="100%" style="border: 0px;"></iframe>'
    },{
        region: 'east',
        width: 200,
        title: 'East',
        html: 'east'
    },{
        region: 'south',
        height: 200,
        title: 'South',
        html: 'south'
    }]
});