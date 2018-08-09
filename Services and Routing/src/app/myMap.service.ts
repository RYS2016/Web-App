import { Injectable } from '@angular/core';
import { Jsonp, URLSearchParams, Response} from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';


@Injectable()
export class MyMapService {

  constructor(private jsonp: Jsonp) { }

  getData(Boston, Cambridge): Observable<any> {

    let from: string = 'Boston, MA';    
    let to: string = 'Cambridge, MA';
    let key: any = 'V7opraQBXGsVgjPAUc73pKUh6h3hS44F'; 
    
    let url: string = 'http://open.mapquestapi.com/directions/v2/route?key=' + 
    key + '&from=' + from + '&to=' + to;

    let params = new URLSearchParams();
        params.set('Boston', from);
        params.set('Cambridge', to);
        params.set('format', 'json');
        params.set('jsoncallback', 'JSON_CALLBACK');

        return this.jsonp
                 .get(url, {search: params})
                 .map((res: Response) => res.json());
        }



}
