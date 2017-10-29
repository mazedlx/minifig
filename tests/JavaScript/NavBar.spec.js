import { createLocalVue, shallow } from 'vue-test-utils';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import NavBar from '../../resources/assets/js/components/NavBar.vue';

const localVue = createLocalVue();

localVue.use(VueRouter);
localVue.use(Vuex);

describe('NavBar.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = shallow(NavBar, {
            localVue,
        });
    });

    it('renders a div', () => {
        expect(wrapper.contains('div')).toBe(true);
    });
});
