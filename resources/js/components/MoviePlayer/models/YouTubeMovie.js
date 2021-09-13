export class YouTubeMovie {
    constructor (url) {
        this._url = url
    }

    get id () {
        return this._url.replace(/^(?:https:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\S]{11}).*/, '$1')
    }

    get playerUrl () {
        return `https://www.youtube.com/embed/${this.id}`
    }

    async getThumbnail () {
        return `http://img.youtube.com/vi/${this.id}/mqdefault.jpg`
    }
}
