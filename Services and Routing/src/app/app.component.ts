import { Component, OnInit } from '@angular/core';

import { MyMapService } from './myMap.service';
import { Observable } from 'rxjs/Observable'


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [MyMapService]  
})

export class AppComponent implements OnInit {

  dataItems: Observable<any[]>;

  constructor  (private myMapService: MyMapService) {}
      ngOnInit () {
        this.myMapService
            .getData('Boston', 'Ca{mbridge')
            .subscribe (result => {this.dataItems = result.items});
      
  }
}
