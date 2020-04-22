import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabDomainesComponent } from './tab-domaines.component';

describe('TabDomainesComponent', () => {
  let component: TabDomainesComponent;
  let fixture: ComponentFixture<TabDomainesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabDomainesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabDomainesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
