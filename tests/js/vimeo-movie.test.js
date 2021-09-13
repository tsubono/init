import { VimeoMovie } from '../../resources/js/components/MoviePlayer/models/VimeoMovie.js'

const urls = [
    ['https://vimeo.com/83949049'],
    ['https://player.vimeo.com/video/83949049?h=d02aef1c94&title=0&byline=0&portrait=0'],
]

describe.each(urls)('Vimeo Movie:%s', (url) => {
    let movie

    beforeEach(() => {
        movie = new VimeoMovie(url)
    })

    test('ID取得', () => {
        expect(movie.id).toBe('83949049')
    })

    test('プレーヤーのURL取得', () => {
        expect(movie.playerUrl).toBe('https://player.vimeo.com/video/83949049')
    })

    test('サムネイル取得', async () => {
        const thumbnailUrl = await movie.getThumbnail()
        expect(thumbnailUrl).toBe('https://i.vimeocdn.com/video/523628874_640')
    })
})
