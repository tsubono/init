import axios from 'axios'

export class VimeoMovie {
    constructor (url) {
        this._url = url
    }

    get id () {
        return this._url.replace(/(?:http|https)?:\/\/(?:www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|video\/|)(\d+)(?:|\/\?).*/, '$1')
    }

    get playerUrl () {
        return `https://player.vimeo.com/video/${this.id}`
    }

    async getThumbnail () {
        let origin
        try {
            origin = location?.origin
        } catch (e) {
            origin = 'http://init.test'
        }
        const { data } = await axios.get(`${origin}/api/proxy/vimeo-thumbnail/${this.id}`)
        return data.thumbnail_url.replace('http://', 'https://')
    }
}
