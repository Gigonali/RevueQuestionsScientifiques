import { Pipe, PipeTransform } from '@angular/core';
import { DatePipe } from '@angular/common';

@Pipe({
  name: 'dateCustom'
})
export class DateCustomPipe implements PipeTransform {

  transform(value: string, ...args: any): any {
    if (value !== undefined) {
      const dateTab = value.split('-');
      return `${dateTab[0].substring(0, 2)}/${dateTab[1].substring(0, 2)}/${dateTab[2].substring(0, 4)}`
             + ` à ${dateTab[3].substring(0, 2)}h${dateTab[4].substring(0, 2)}`;
    }
  }

}
