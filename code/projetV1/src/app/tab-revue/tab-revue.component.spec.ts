import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabRevueComponent } from './tab-revue.component';

describe('TabRevueComponent', () => {
  let component: TabRevueComponent;
  let fixture: ComponentFixture<TabRevueComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabRevueComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabRevueComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
