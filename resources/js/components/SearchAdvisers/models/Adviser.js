const days = {
    monday: '月',
    tuesday: '火',
    wednesday: '水',
    thursday: '木',
    friday: '金',
    saturday: '土',
    sunday: '日',
}

export class Adviser {
    #id
    #fullName
    #gender
    #avatarImage
    #prText
    #fromCountry
    #residenceCountry
    #languages
    #categories
    #availableTimes

    constructor (adviser) {
        this.#id = adviser.id
        this.#fullName = adviser.full_name
        this.#gender = adviser.gender || ''
        this.#avatarImage = adviser.avatar_image
        this.#prText = adviser.pr_text || ''
        this.#fromCountry = adviser.from_country || { name: '' }
        this.#residenceCountry = adviser.residence_country || { name: '' }
        this.#languages = adviser.languages || []
        this.#categories = adviser.categories || []
        this.#availableTimes = Object.entries(adviser.available_times)
            .reduce((sub, [day, {start, end}]) => ({
                ...sub,
                [day]: {
                    day: days[day],
                    start,
                    end,
                }
            }), {})
    }

    get id () {
        return this.#id
    }

    get fullName () {
        return this.#fullName
    }

    get gender () {
        return this.#gender
    }

    get avatarImage () {
        return this.#avatarImage
    }

    get prTextSliced () {
        if (this.#prText.length <= 200) {
            return this.#prText
        } else {
            return this.#prText.slice(0, 200) + '...'
        }
    }

    get fromCountryName () {
        return this.#fromCountry.name
    }

    get residenceCountryName () {
        return this.#residenceCountry.name
    }

    get languagesText () {
        return this.#languages.map(({name}) => name).join(' / ')
    }

    get categories () {
        return this.#categories
    }

    get availableTimes () {
        return this.#availableTimes
    }

    get url () {
        return location.origin + '/advisers/' + this.#id
    }
}
