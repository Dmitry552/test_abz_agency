import type {Action, Module} from "vuex";
import type {TPositionState} from "@/store/Position";
import type {TTokenState} from "@/store/Token";
import type {TUserState} from "@/store/User";

export type TRootState = {
    token: TTokenState,
    position: TPositionState,
    users: TUserState
};

export type CustomAction<T> = Action<T, TRootState>;
export type CustomModule<T> = Module<T, TRootState>;
