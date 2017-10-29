import { createLocalVue, shallow } from 'vue-test-utils';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import moxios from 'moxios';
import axios from 'axios';
import sinon from 'sinon';

import Overview from '../../resources/assets/js/components/Overview.vue';

const localVue = createLocalVue();

localVue.use(VueRouter);
localVue.use(Vuex);

describe.only('Overview.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallow(Overview, {
            localVue,
        });

        moxios.install();
    });

    afterEach(() => {
        moxios.uninstall();
    });

    it('renders two cards with the latest set and latest minifig', (done) => {
        moxios.stubRequest('/api/sets/latest', {
            status: 200,
            response: {
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
            },
        });

        moxios.stubRequest('/api/minifigs/latest', {
            status: 200,
            response: {
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
            },
        });

        moxios.withMock(() => {
            const setFetched = sinon.spy();
            axios.get('/api/sets/latest').then(setFetched);

            const minifigFetched = sinon.spy();
            axios.get('/api/minifigs/latest').then(minifigFetched);

            moxios.wait(() => {
                const setRequest = moxios.requests.get('get', '/api/sets/latest');
                const minifigRequest = moxios.requests.get('get', '/api/minifigs/latest');

                setRequest.respondWith({
                    status: 200,
                    response: {
                        id: 27,
                        name: 'reiciendis',
                        number: 85235,
                        filename: 'images/797132e972e08b3ca9c2542c3d30278c.jpg',
                    },
                }).then(() => {
                    minifigRequest.respondWith({
                        status: 200,
                        response: {
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
                        },
                    }).then(() => {
                        expect(wrapper.html().toContain('Chase McCain'));
                        done();
                    });
                });
            });
        });
    });
});
