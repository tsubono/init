import { YouTubeMovie } from '../../resources/js/components/MoviePlayer/models/YouTubeMovie.js'

const urls = [
    ['https://www.youtube.com/watch?v=57wtrBtPma4'],
    ['https://youtu.be/57wtrBtPma4'],
]

describe.each(urls)('YouTube Movie:%s', (url) => {
    let movie

    beforeEach(() => {
        movie = new YouTubeMovie(url)
    })

    test('ID取得', () => {
        expect(movie.id).toBe('57wtrBtPma4')
    })

    test('プレーヤーのURL取得', () => {
        expect(movie.playerUrl).toBe('https://www.youtube.com/embed/57wtrBtPma4')
    })

    test('サムネイル取得', async () => {
        const thumbnailUrl = await movie.getThumbnail()
        expect(thumbnailUrl).toBe('http://img.youtube.com/vi/57wtrBtPma4/mqdefault.jpg')
    })
})
