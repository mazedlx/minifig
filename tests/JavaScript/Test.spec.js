import { createLocalVue, shallow } from 'vue-test-utils';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Test from '../../resources/assets/js/components/Test.vue';

const localVue = createLocalVue();

localVue.use(VueRouter);
localVue.use(Vuex);

describe('Test.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallow(Test, {
            localVue,
        });
    });

    it('defaults to a count of 0', () => {
        expect('stuff').not.toContain('stuff');
    });
});
