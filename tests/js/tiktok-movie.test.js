import { TikTokMovie } from '../../resources/js/components/MoviePlayer/models/TikTokMovie.js'

const urls = [
    ['https://www.tiktok.com/@meeeeeeeu/video/7000386946027490562'],
]

describe.each(urls)('TikTok Movie:%s', (url) => {
    let movie

    beforeEach(() => {
        movie = new TikTokMovie(url)
    })

    test('ID取得', () => {
        expect(movie.id).toBe('7000386946027490562')
    })

    test('プレーヤーのURL取得', () => {
        expect(movie.playerUrl).toBe('https://www.tiktok.com/embed/v2/7000386946027490562?lang=ja')
    })

    test('サムネイル取得', async () => {
        const thumbnailUrl = await movie.getThumbnail()
        expect(thumbnailUrl).toMatch(/^https:\/\/p16-sign-sg\.tiktokcdn\.com/)
    })
})
