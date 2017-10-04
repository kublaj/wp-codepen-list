(function () {
    tinymce.PluginManager.add('pine_codepen_list', function (editor, url) {
        editor.addButton('pine_codepen_list', {
            icon: 'code',
            title: PineCodePenList.insertList,
            type: 'button',
            onclick: function () {
                editor.windowManager.open({
                    title: PineCodePenList.insertList,
                    body: [
                        {
                            type: 'textbox',
                            name: 'username',
                            label: PineCodePenList.username,
                            value: ''
                        },
                        {
                            type: 'textbox',
                            name: 'posts',
                            label: PineCodePenList.count,
                            value: 5
                        },
                        {
                            type: 'listbox',
                            name: 'type',
                            label: PineCodePenList.type,
                            values: [
                                {text: PineCodePenList.public, value: 'public'},
                                {text: PineCodePenList.popular, value: 'popular'},
                                {text: PineCodePenList.posts, value: 'posts'},
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'cachetime',
                            label: PineCodePenList.cacheTime,
                            values: [
                                {text: '6 ' + PineCodePenList.hours, value: '21600'},
                                {text: '12 ' + PineCodePenList.hours, value: '43200'},
                                {text: '24 ' + PineCodePenList.hours, value: '86400'},
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'target',
                            label: PineCodePenList.target,
                            values: [
                                {text: PineCodePenList.sameWindow, value: '_self'},
                                {text: PineCodePenList.newWindow, value: '_new'},
                            ]
                        },
                    ],
                    onsubmit: function (e) {
                        var props = '';
                        for (var i in e.data) {
                            props += ' ' + i + '="' + e.data[i] + '"';
                        }
                        editor.insertContent('[codepen-list' + props + ']');
                    }
                });
            }
        });
    });
})();
