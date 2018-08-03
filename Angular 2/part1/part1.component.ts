import { Component, OnInit } from '@angular/core';
import { LocalStorageService } from 'angular-2-local-storage';

@Component({
  selector: 'app-part1',
  templateUrl: './part1.component.html',
  styleUrls: ['./part1.component.css']
})

export class Part1Component implements OnInit {

  books: Array<any>;

  constructor () {
        
        this.books = (localStorage.getItem('books')!==null)
         ? JSON.parse(localStorage.getItem('books')) : [ 
        {title: 'Absolute Java', qty: 1, price: 114.95},
        {title: 'Pro HTML5', qty: 1, price: 27.95},
        {title: 'Head First HTML5', qty: 1, price: 27.89}
        ];       
 }
 
        getTotal () {
            
            let total: number = 0;

                for (let i = 0; i < this.books.length; i++) {
                      let product: any = this.books[i];
                        total += product.price * product.qty;
                }
                return total;
            };

        removeBook () {
              let index: number = this.books.indexOf(this);
                this.books.splice(index, 1);
            };

        addBook () {
                this.books.push({
                    title: 'New Book',
                    qty: 1,
                    price: 10.99
                });      
                    }
        saveCart  () {
                localStorage.setItem('books', JSON.stringify(this.books))     
                 }; 
        
        ngOnInit() {
  }
}
