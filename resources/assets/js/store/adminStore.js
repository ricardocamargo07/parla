/**
 * Vuex
 */

import Vuex from 'vuex'

Vue.use(Vuex)

window.vuexAdminStore = new Vuex.Store({
    state: {
        editions: [],

        busy: false,

        filter: '',

        orderBy: '',

        currentEdition: null,

        currentArticle: null,

        currentArticleOriginal: null,

        currentArticles: [],

        editionArticles: [],

        editionArticlesOriginals: [],

        iFrameUrl: null,

        newEdition: {
            number: null,
            year: null,
            month: null,
        },
    },

    mutations: {
        setEditions(state, payload) {
            state.editions = payload
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

        setCurrentArticle(state, payload) {
            dd('setCurrentArticle ---------------- 1', payload)
            Vue.set(state.currentArticles, state.currentEdition.id, payload)

            dd('setCurrentArticle ---------------- 2')
            state.currentArticle =
                state.currentArticles[state.currentEdition.id]

            dd('setCurrentArticle ---------------- 3')
            state.currentArticleOriginal =
                state.editionArticlesOriginals[state.currentEdition.id][
                    payload.id
                ]
            dd('setCurrentArticle ---------------- 4')
        },

        updateCurrentArticleField(state, payload) {
            Vue.set(
                state.currentArticles[state.currentEdition.id],
                payload.field,
                payload.value,
            )
        },

        updateLead(state, payload) {
            Vue.set(
                state.editionArticles[state.currentEdition.id],
                'lead',
                payload,
            )
        },

        updateLeadHtml(state, payload) {
            Vue.set(
                state.editionArticles[state.currentEdition.id],
                'lead_html',
                payload,
            )
        },

        updateBodyHtml(state, payload) {
            Vue.set(
                state.editionArticles[state.currentEdition.id],
                'body_html',
                payload,
            )
        },

        updateBody(state, payload) {
            Vue.set(
                state.editionArticles[state.currentEdition.id],
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
            dd(
                '-------------- pushArticle - BEFORE',
                state.currentEdition.id,
                clone(state.currentArticles),
                payload,
            )

            state.currentArticles.splice(
                state.currentEdition.id,
                1,
                clone(payload),
            )

            state.editionArticlesOriginals.splice(
                state.currentEdition.id,
                1,
                clone(payload),
            )

            dd(
                '-------------- pushArticle - AFTER',
                state.currentEdition.id,
                state.currentArticles,
                payload,
            )
        },

        setCurrentArticleFeatured(state, payload) {
            Vue.set(
                state.editionArticles[state.currentEdition.id],
                'featured',
                payload,
            )
        },

        clearNewEdition(state, payload) {
            state.newEdition = {
                number: null,
                year: null,
                month: null,
            }
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
            store.newEdition.number = payload
        },

        setNewEditionYear(state, payload) {
            store.newEdition.year = payload
        },

        setNewEditionMonth(state, payload) {
            store.newEdition.month = payload
        },
    },

    getters: {
        currentArticles(state, getters) {
            dd('getters - currentArticles')

            return empty(state.editionArticles) ||
                empty(state.currentEdition) ||
                empty(state.editionArticles[state.currentEdition.id])
                ? []
                : state.editionArticles[state.currentEdition.id]
        },
    },
})
