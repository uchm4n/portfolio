module.exports = {
    title: 'Portfolio',
    description: 'Portfolio page',
    locales: {
        '/': {
            lang: 'en-US', // this will be set as the lang attribute on <html>
            label: 'English',
            title: 'My Portfolio',
            description: 'This is my portfolio page'
        },
        '/ge/': {
            lang: 'ka-GE',
            label: 'ქართული',
            title: 'პორტფოლიო',
            description: 'ეს არის ჩემი პორთფოლიო გვერდი'
        }
    },

    themeConfig: {

        locales: {
            '/': {
                // text for the language dropdown
                selectText: 'Languages',
                // label for this locale in the language dropdown
                label: 'English',
                // text for the edit-on-github link
                editLinkText: 'Edit this page on GitHub',
                nav: [
                    {text: 'Profile', link: '/profile'},
                    {text: 'Demo', link: '/demo'}
                ],
                sidebar: ['/profile', '/demo']
            },
            '/ge/': {
                selectText: 'ენა',
                label: 'ქართული',
                editLinkText: 'დააედიტე GitHub-ზე',
                nav: [
                    {text: 'პროფაილი', link: '/ge/profile'},
                    {text: 'დემო', link: '/ge/demo'}
                ],
                sidebar: ['/ge/profile', '/ge/demo']
            }
        }

    },


    markdown: {
        anchor: {permalink: false},
        toc: {includeLevel: [1, 2]}
    }

};