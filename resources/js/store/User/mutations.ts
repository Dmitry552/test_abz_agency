import * as types from './mutationsUserTypes';
import type {TUserState} from "@/store/User/index";
import type {User} from "@/types";

export default {
    [types.GET_USERS]: (state: TUserState, payload: User[]): void => {
        state.users = payload;
    },
    [types.GET_USER]: (state: TUserState, payload: User): void => {
        state.user = payload;
    },
    [types.ADD_USERS]: (state: TUserState, payload: User[]): void => {
        state.users = [...state.users!, ...payload]
    }
}
