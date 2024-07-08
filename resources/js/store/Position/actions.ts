import type {CustomAction} from "@/store/types";
import type {TPositionState} from "@/store/Position/index";
import type {Commit} from "vuex";
import {$http} from "@/utils/http";
import type {IGetPositions} from "@/store/Position/types";
import {GET_POSITIONS} from './mutations';

export const getPositions: CustomAction<TPositionState> = (
        {commit}: {commit: Commit}
    ): Promise<void> => {
        return new Promise((resolve, reject) => {
            $http.get<IGetPositions>('/api/positions').then(({data}) => {
                commit(GET_POSITIONS, data.positions);
                resolve();
            }).catch(({response: {data}}) => {
                reject(data);
            })
        });
};
