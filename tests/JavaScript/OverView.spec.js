import { createLocalVue, shallow } from 'vue-test-utils'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import moxios from 'moxios'
import Overview from '../../resources/assets/js/components/Overview.vue'

const factory = function () {
    const localVue = createLocalVue()

    localVue.use(VueRouter)
    localVue.use(Vuex)

    return shallow(Overview, {
        localVue,
        attachToDocument: true,
    })
}

describe.only('Overview.vue', () => {
    beforeEach(() => {
        moxios.install(axios)
    })

    afterEach(() => {
        moxios.uninstall(axios)
    })

    it('sets the latest minifig', done => {
        const stubResponse = {
            id: 1,
            set_id: 11,
            name: 'et',
            setName: 'est',
            setNumber: 21871,
            images: [
                {
                    id: 1,
                    minifig_id: 1,
                    filename: 'images/252a35311d48445df9fec9b1f75cc9a9.jpg',
                },
            ],
        }

        moxios.stubRequest('/api/minifigs/latest', {
            status: 200,
            response: stubResponse,
        })

        const wrapper = factory()

        moxios.wait(() => {
            expect(wrapper.vm.$data.latestMinifig).toEqual(stubResponse)
            done()
        })
    })

    it('sets the latest set', done => {
        const stubRequest = {
            id: 27,
            name: 'reiciendis',
            number: 85235,
            filename: 'images/797132e972e08b3ca9c2542c3d30278c.jpg',
            minifigs: [
                {
                    id: 17,
                    set_id: 27,
                    name: 'consequatur',
                    setName: 'reiciendis',
                    setNumber: 85235,
                    images: [
                        {
                            id: 17,
                            minifig_id: 17,
                            filename: 'images/0d09b3d954709b5f69faa10ce7259501.jpg',
                        },
                    ],
                },
            ],
        }

        moxios.stubRequest('/api/sets/latest', {
            status: 200,
            response: stubRequest
        })

        moxios.wait(() => {
            expect(wrapper.vm.$data.latestSet).toEqual(stubRequest)
            done()
        })
    })
})