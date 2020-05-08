import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'dateCustom'
})
export class DateCustomPipe implements PipeTransform {

  transform(value: unknown, ...args: unknown[]): unknown {
    return value[0] + value[1] + '/' + value[3] + value[4] + '/' + value[6]  + value[7] + value[8] + value[9] + ', ' +
    value[11] + value[12] + 'h' + value[14] + value[15];
  }

}
