import type {InjectionKey} from 'vue';
import { createStore, Store, useStore as baseUseStore} from 'vuex';
import type {TRootState} from "@/store/types";
import PositionModule from "@/store/Position";
import TokenModule from "@/store/Token";
import UserModule from "@/store/User";

export const key: InjectionKey<Store<TRootState>> = Symbol()

export const store: Store<TRootState> = createStore<TRootState>({
    modules: {
        token: TokenModule,
        position: PositionModule,
        users: UserModule
    }
});

export function useStore (): Store<TRootState> {
    return baseUseStore(key)
}
