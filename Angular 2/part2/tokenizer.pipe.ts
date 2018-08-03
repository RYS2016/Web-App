import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'tokenizer'
})
export class TokenizerPipe implements PipeTransform {

  transform(str: any, glue: any): any {
                    if (!str) {
                        return str;
                    }
                    if (String(str)) {
                        str = str.toString();
                    }

                    return str.split('').join(glue);
   
  }

}
