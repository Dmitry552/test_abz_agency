import type {CustomAction} from "@/store/types";
import type {TTokenState} from "@/store/Token/index";
import type {Commit} from "vuex";
import type {IGetToken} from "@/store/Token/types";
import {GET_TOKEN} from './mutationsTokenTypes';
import {$http} from "@/utils/http";


export const getToken: CustomAction<TTokenState> = (
    {commit}: {commit: Commit}
): Promise<void> => {
    return new Promise((resolve, reject) => {
        $http.get<IGetToken>('/api/token')
            .then(({data}) => {
                commit(GET_TOKEN, data.token);
                resolve();
            }).catch(() => {
                reject();
            });
    });
}
