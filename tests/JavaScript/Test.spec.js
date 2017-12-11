import { createLocalVue, shallow } from 'vue-test-utils';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Test from '../../resources/assets/js/components/Test.vue';
import moxios from 'moxios';
import axios from 'axios';
import sinon from 'sinon';

const localVue = createLocalVue();

localVue.use(VueRouter);
localVue.use(Vuex);

describe('Test.vue', () => {
    let wrapper;

    beforeEach(() => {
        moxios.install(window.axios);

        wrapper = shallow(Test, {
            localVue,
            attachToDocument: true,
        });
    });

    afterEach(() => {
        moxios.uninstall(window.axios);
    });

    it('returns data after the api call', (done) => {
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

        moxios.wait(() => {
            expect(wrapper.vm.$data.m).toEqual({
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
            });

            done();
        });
    });
});
