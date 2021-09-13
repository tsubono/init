import axios from 'axios'

export class TikTokMovie {
    constructor (url) {
        this._url = url
    }

    get id () {
        return this._url.replace(/^.*video\/([^/]+)\/?.*$/, '$1')
    }

    get playerUrl () {
        return `https://www.tiktok.com/embed/v2/${this.id}?lang=ja`
    }

    async getThumbnail () {
        let origin
        try {
            origin = location?.origin
        } catch (e) {
            origin = 'http://init.test'
        }
        const {data} = await axios.get(`${origin}/api/proxy/tiktok-thumbnail`, {params: {url: this._url}})
        return data.thumbnail_url.replace('http://', 'https://')
    }
}
