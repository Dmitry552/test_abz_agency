import type {TTokenState} from "@/store/Token/index";
import * as types from './mutationsTokenTypes';
import {store} from "@/store";

export default {
    [types.GET_TOKEN]: (state: TTokenState, payload: string): void => {
        state.token = payload;
    },
    [types.DELETE_TOKEN]: (state: TTokenState): void => {
        state.token = null;
    }
}

export const deleteToken = () => store.commit(types.DELETE_TOKEN);
