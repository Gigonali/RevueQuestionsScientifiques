import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabSpecialhelhaComponent } from './tab-specialhelha.component';

describe('TabSpecialhelhaComponent', () => {
  let component: TabSpecialhelhaComponent;
  let fixture: ComponentFixture<TabSpecialhelhaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabSpecialhelhaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabSpecialhelhaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
