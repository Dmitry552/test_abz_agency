import * as getters from './getters';
import * as actions from './actions';
import mutations from "@/store/User/mutations";
import type {User} from "@/types";
import type {CustomModule} from "@/store/types";

export type TUserState = {
    user: User | null
    users: User[] | null
}

const state: TUserState = {
    user: null,
    users: null
}

const UserModule: CustomModule<TUserState> = {
    state,
    getters,
    actions,
    mutations
}

export default UserModule;
