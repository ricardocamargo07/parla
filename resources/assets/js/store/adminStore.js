/**
 * Vuex
 */

import Vuex from 'vuex'

Vue.use(Vuex)

window.vuexAdminStore = new Vuex.Store({
    state: {
        editions: [],

        editorial: '',

        editorialCopy: '',

        busy: false,

        filter: '',

        orderBy: '',

        timeout: null,

        currentEdition: null,

        currentArticle: null,

        currentPhotoId: null,

        currentPhoto: null,

        currentPhotoOriginal: null,

        currentArticleOriginal: null,

        currentArticles: {},

        editionArticles: [],

        editionArticlesOriginals: [],

        iFrameUrl: null,

        newEdition: {
            id: null,
            number: null,
            year: null,
            month: null,
        },

        cleanNewPhoto: {
            article_id: null,
            author: '',
            url_highres: '',
            url_lowres: '',
            notes: '',
        },

        newPhoto: null,
    },

    mutations: {
        setEditions(state, payload) {
            state.editions = payload
        },

        setEditorial(state, payload) {
            state.editorial = payload
        },

        setEditorialCopy(state, payload) {
            state.editorialCopy = payload
        },

        setBusy(state, payload) {
            state.busy = payload
        },

        setFilter(state, payload) {
            state.filter = payload
        },

        setOrderBy(state, payload) {
            state.orderBy = payload
        },

        setIFrameUrl(state, payload) {
            state.iFrameUrl = payload
        },

        setTimeout(state, payload) {
            state.timeout = payload
        },

        setCurrentPhotoId(state, payload) {
            state.currentPhotoId = payload

            if (state.currentPhotoId && state.currentArticle) {
                state.currentPhoto = findItemByValue(
                    state.currentPhotoId,
                    state.currentArticle.photos,
                    'id',
                )

                state.currentPhotoOriginal = clone(state.currentPhoto)
            }
        },

        setCurrentArticle(state, payload) {
            Vue.set(state.currentArticles, state.currentEdition.id, payload)

            state.currentArticle =
                state.currentArticles[state.currentEdition.id]

            state.currentArticleOriginal =
                state.editionArticlesOriginals[state.currentEdition.id][
                    payload.id
                ]
        },

        updateCurrentArticleField(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                payload.field,
                payload.value,
            )
        },

        updateCurrentPhotoField(state, payload) {
            Vue.set(state.currentPhoto, payload.field, payload.value)
        },

        updateLead(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                'lead',
                payload,
            )
        },

        updateLeadHtml(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                'lead_html',
                payload,
            )
        },

        updateBodyHtml(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                'body_html',
                payload,
            )
        },

        updateBody(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                'body',
                payload,
            )
        },

        setEditionArticles(state, payload) {
            Vue.set(state.editionArticles, payload.editionId, payload.value)

            Vue.set(
                state.editionArticlesOriginals,
                payload.editionId,
                clone(payload.value),
            )
        },

        pushArticle(state, payload) {
            state.editionArticles[state.currentEdition.id].push(payload)

            Vue.set(state.currentArticles, state.currentEdition.id, payload)

            state.editionArticlesOriginals[state.currentEdition.id].push(
                clone(payload),
            )
        },

        setCurrentArticleFeatured(state, payload) {
            state.currentArticle.featured = payload
        },

        clearNewEdition(state, payload) {
            state.newEdition = {
                id: null,
                number: null,
                year: null,
                month: null,
            }
        },

        loadNewEditionData(state, payload) {
            state.newEdition = {
                id: payload.id,
                number: payload.number,
                year: payload.year,
                month: payload.month,
            }
        },

        clearNewPhoto(state) {
            state.newPhoto = clone(state.cleanNewPhoto)
        },

        fillNewPhotoArticle(state, payload) {
            state.newEdition.article_id = state.currentArticle.id
        },

        setCurrentEdition(state, payload) {
            state.currentEdition = payload

            state.currentArticle =
                empty(state.currentArticles) ||
                empty(state.currentArticles[state.currentEdition.id])
                    ? null
                    : state.currentArticles[state.currentEdition.id]
        },

        setNewEditionNumber(state, payload) {
            state.newEdition.number = payload
        },

        setNewEditionYear(state, payload) {
            state.newEdition.year = payload
        },

        setNewEditionMonth(state, payload) {
            state.newEdition.month = payload
        },

        setNewPhotoAuthor(state, payload) {
            state.newPhoto.author = payload
        },

        setNewPhotoUrlLowres(state, payload) {
            state.newPhoto.url_lowres = payload
        },

        setNewPhotoUrlHighres(state, payload) {
            state.newPhoto.url_highres = payload
        },

        setNewPhotoNotes(state, payload) {
            state.newPhoto.notes = payload
        },
    },

    getters: {
        currentArticles(state, getters) {
            return empty(state.editionArticles) ||
                empty(state.currentEdition) ||
                empty(state.editionArticles[state.currentEdition.id])
                ? []
                : state.editionArticles[state.currentEdition.id]
        },
    },
})
