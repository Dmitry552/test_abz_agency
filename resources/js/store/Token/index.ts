import * as getters from './getters';
import * as actions from './actions';
import type {CustomModule} from "@/store/types";
import mutations from "@/store/Token/mutations";


export type TTokenState = {
    token: string | null
}

const state: TTokenState = {
    token: null
}

const TokenModule: CustomModule<TTokenState> = {
    state,
    getters,
    actions,
    mutations
}

export default TokenModule;
